<?php

namespace DntJobs;

use DntLibrary\Base\Dnt;

class FormExportJob
{
    const DEFAUL_TIME = '1900-01-01 00:00:00';
    const CYCLONE_LAST_ID = 198861; //'190296';
    const GOL_LAST_ID = 10719;

    protected $null = '';

    private $dnt;

    private $i; //'10003';

    public function __construct()
    {
        $this->dnt = new Dnt();
    }

    protected function clean($str)
    {
        //$str = preg_replace("~[\r\n\t]+~", "", $str);
        //$str = str_replace(' ;', ';', $str);
        //$str = str_replace('; ', ';', $str);
        //$str = str_replace('; ', ';', $str);
        return $str;
    }

    protected function setStandard($row, $obj)
    {
        if (isset($row->$obj)) {
            $data = $row->$obj;
            $data = str_replace(';', '', $data);
            $data = str_replace('"', '', $data);
            $data = str_replace("'", '', $data);
            $data = str_replace("'", '', $data);
            $data = preg_replace(array('/\s{2,}/', '/[\t\n]/'), ' ', $data);
            return $data;
        }
        return false;
    }

    protected function setAddr($row)
    {
        $data = [];
        if (!empty($row->ulica)) {
            $data['u'] = $row->ulica;
        }
        if (!empty($row->psc)) {
            $data['p'] = $row->psc;
        }
        if (!empty($row->c_domu)) {
            $data['c'] = $row->c_domu;
        }
        if (!empty($row->mesto)) {
            $data['m'] = $row->mesto;
        }
        return join(', ', $data);
    }

    protected function setDateOfBirth($row)
    {
        if ($row->form_id == 2 || $row->form_id == 3) {
            return $row->datetime_created;
        } else {
            return self::DEFAUL_TIME;
        }
    }

    protected function setDateOfCreated($row)
    {
        if ($row->id == 2 || $row->id == 3) {
            return $this->dnt->datetime();
        } else {
            if (explode(' ', $row->datetime_created)[0] == '0000-00-00') {
                return self::DEFAUL_TIME;
            }
            return $row->datetime_created;
        }
    }

    protected function setDateTimeBirth($row)
    {
        if (explode(' ', $row->date_of_birth)[0] == '0000-00-00') {
            return self::DEFAUL_TIME;
        }
        return $row->date_of_birth;
    }

    protected function setJson($row)
    {
        $final = [];
        foreach ($row as $key => $item) {
            if ($key != 'message') {
                $final[$key] = $this->setStandard($row, $key);
            }
        }
        return json_encode($final);
    }

    protected function setMessage($row)
    {
        //return 24;
        $message = $this->setStandard($row, 'message');
        return $message;
    }

    protected function exclude($row)
    {
        $datetime = [
            '2020-07-02 20:58:21',
            '2020-11-11 20:03:33',
            '2020-10-24 21:24:43',
            '2020-06-30 16:27:42',
            '2020-08-14 16:25:26',
            '2020-08-07 13:38:30',
        ];
        if (in_array($row->datetime_created, $datetime)) {
            return true;
        }
        return false;
    }

    protected function setSignature($row)
    {
        $time = strtotime($row->datetime_created);
        $email = $row->email;
        return md5($email) . '-' . md5($time);
    }

    protected function cycloneForms()
    {
        $json = file_get_contents('data/exportForms.json');
        var_dump(end(json_decode($json)));
        //var_dump(end(json_decode($json)));
        //exit;
        $data = [];
        $i = 1;
        foreach (json_decode($json) as $k => $row) {
            if ($i <= 100000000) {
                if ($row->id > self::CYCLONE_LAST_ID) {
                    $data[$k][] = 'null';
                    $data[$k][] = $this->setStandard($row, 'form_id');
                    $data[$k][] = $this->setStandard($row, 'kolo');
                    $data[$k][] = $this->setStandard($row, 'meno');
                    $data[$k][] = $this->setStandard($row, 'priezvisko');
                    $data[$k][] = $this->setStandard($row, 'login');
                    $data[$k][] = $this->setStandard($row, 'email');
                    $data[$k][] = $this->setAddr($row);
                    $data[$k][] = $this->setStandard($row, 'telefon');
                    $data[$k][] = '0';
                    $data[$k][] = $this->setStandard($row, 'odpoved');
                    $data[$k][] = $this->setStandard($row, 'winner');
                    $data[$k][] = '1';
                    if ($this->exclude($row)) {
                        $data[$k][] = '[]';
                        $data[$k][] = '';
                    } else {
                        $data[$k][] = $this->setJson($row);
                        $data[$k][] = $this->setMessage($row);
                    }
                    $data[$k][] = $this->setDateOfBirth($row);
                    $data[$k][] = $this->setDateOfCreated($row);
                    $data[$k][] = '1';
                    $data[$k][] = $this->setSignature($row);
                }
            }
            $i++;
        }

        $this->i = $i;
        return $data;
    }

    protected function golMesiaca()
    {
        $json = file_get_contents('data/exportGol.json');
        var_dump(end(json_decode($json)));
        //exit;
        $data = [];
        $i = $this->i;
        foreach (json_decode($json) as $k => $row) {
            if ($i <= 100000000) {
                if ($row->id > self::GOL_LAST_ID) {
                    $data[$k][] = 'null';
                    $data[$k][] = 100; //form_id
                    $data[$k][] = $this->setStandard($row, 'round_id');
                    $data[$k][] = $this->setStandard($row, 'name');
                    $data[$k][] = $this->setStandard($row, 'surname');
                    $data[$k][] = $this->setStandard($row, 'login');
                    $data[$k][] = $this->setStandard($row, 'email');
                    $data[$k][] = '';
                    $data[$k][] = '';
                    $data[$k][] = '0';
                    $data[$k][] = $this->setStandard($row, 'poll_id');
                    $data[$k][] = 0;
                    $data[$k][] = '1';
                    if ($this->exclude($row)) {
                        $data[$k][] = '[]';
                        $data[$k][] = '';
                    } else {
                        $data[$k][] = $this->setJson($row);
                        $data[$k][] = $this->setMessage($row);
                    }
                    $data[$k][] = $this->setDateTimeBirth($row);
                    $data[$k][] = $this->setDateOfCreated($row);
                    $data[$k][] = $this->setStandard($row, 'is_active');
                    $data[$k][] = $this->setSignature($row);
                }
            }
            $i++;
        }
        return $data;
    }

    public function run()
    {
        ini_set('memory_limit', '4096M');
        $cyclone = $this->cycloneForms();
        $golmesiaca = $this->golMesiaca();

        $fp = fopen('data/formsCsv2_' . self::CYCLONE_LAST_ID . '_' . self::GOL_LAST_ID . '.csv', 'w');
        foreach (array_merge($cyclone, $golmesiaca) as $fields) {
            fputcsv(
                $fp,
                $fields,
                ';',
                '"',
                '\\'
            );
        }
    }
}
