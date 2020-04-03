<?php

class CovidWorldJob
{

    protected $serviceUrl = 'https://www.worldometers.info/coronavirus/';
    protected $json;
    protected $covidData;
    protected $yesterdayCovidData;
    protected $finalData;
    protected $dnt;
    protected $dom;
    protected $firstCovidCase = 0;

    const TODAY = 'main_table_countries_today';
    const YESTERDAY = 'main_table_countries_yesterday';

    public function __construct()
    {
        $this->dnt = new Dnt();
        $this->dom = new DOMDocument();
        $this->getData();
        $this->initYesterdayData();
        $this->finalData();
    }

    protected function getData()
    {
        $content = file_get_contents($this->serviceUrl);
        $this->content = $content;
    }

    protected function clean($string)
    {
        return str_replace('-', '', $this->dnt->name_url($string));
    }

    protected function translate()
    {
        $words = [
            'countryother' => 'Názov krajiny',
            'totalcases' => 'Počet infikovaných',
            'newcases' => 'Nové prípady',
            'totaldeaths' => 'Počet úmrtí',
            'totalrecovered' => 'Počet uzdravených',
            'newdeaths' => 'Nové úmrtia',
            'activecases' => 'Aktívne prípady',
            'seriouscritical' => 'V kritickom stave',
            'totcases1mpop' => 'Počet prípadov na<br/> mil. obyvatelov',
            'deaths1mpop' => 'Počet úmrtí na na 1 milión populácie',
            'reported1stcase' => 'Prvý prípad nákazy'
        ];
        return $words;
    }

    protected function translateState($current)
    {
        $country = [
            'Total:' => 'Celý svet',
            'Switzerland' => 'Švajčiarsko',
            'Mexico' => 'Mexiko',
            'Belgium' => 'Belgicko',
            'Austria' => 'Rakúsko',
            'S. Korea' => 'J. Kórea',
            'China' => 'Čína',
            'Thailand' => 'Thajsko',
            'Malaysia' => 'Malajzia',
            'Russia' => 'Rusko',
            'South Africa' => 'Juhoafrická republika',
            'Indonesia' => 'Indonézia',
            'New Zealand' => 'Nový Zéland',
            'Faeroe Islands' => 'Faerské ostrovy',
            'Vietnam' => 'Vietnam',
            'Armenia' => 'Arménsko',
            'USA' => 'USA',
            'Bosnia and Herzegovina' => 'Bosna a Hercegovina',
            'Uruguay' => 'Uruguaj',
            'Azerbaijan' => 'Azerbajdžan',
            'Bulgaria' => 'Bulharsko',
            'Czechia' => 'Česko',
            'Estonia' => 'Estónsko',
            'Morocco' => 'Maroko',
            'Kazakhstan' => 'Kazachstan',
            'Paraguay' => 'Paraguaj',
            'India' => 'India',
            'Pakistan' => 'Pakistan',
            'Kuwait' => 'Kuvajt',
            'Philippines' => 'Filipíny',
            'Hungary' => 'Maďarsko',
            'Cambodia' => 'Kambodža',
            'Georgia' => 'Gruzínsko',
            'Bangladesh' => 'Bangladéš',
            'Sri Lanka' => 'Srí Lanka',
            'Greenland' => 'Grónsko',
            'Bhutan' => 'Bhután',
            'Gabon' => 'Gabon',
            'Spain' => 'Španielsko',
            'Germany' => 'Nemecko',
            'Italy' => 'Taliansko',
            'Iran' => 'Irán',
            'France' => 'Francúzsko',
            'Canada' => 'Kanada',
            'Denmark' => 'Dánsko',
            'Diamond Princess' => 'Diamond Princess',
            'Australia' => 'Austrália',
            'Peru' => 'Peru',
            'Japan' => 'Japonsko',
            'Turkey' => 'Turecko',
            'Bahrain' => 'Bahrajn',
            'Israel' => 'Izrael',
            'Chile' => 'Čile',
            'Saudi Arabia' => 'Saudská Arábia',
            'Finland' => 'Fínsko',
            'Iceland' => 'Island',
            'Romania' => 'Rumunsko',
            'Singapore' => 'Singapur',
            'Argentina' => 'Argentína',
            'Netherlands' => 'Holandsko',
            'Iraq' => 'Irak',
            'Egypt' => 'egypt',
            'Hong Kong' => 'Hong Kong',
            'UK' => 'Veľká Británia',
            'Brazil' => 'Brazília',
            'Sweden' => 'Švédsko',
            'UAE' => 'SAE',
            'Croatia' => 'Chorvátsko',
            'Luxembourg' => 'Luxembursko',
            'Albania' => 'Albánsko',
            'Qatar' => 'Katar',
            'Slovenia' => 'Slovinsko',
            'Portugal' => 'Portugalsko',
            'Ecuador' => 'Ekvádor',
            'Algeria' => 'Alžírsko',
            'Greece' => 'Grécko',
            'Oman' => 'Omán',
            'Poland' => 'Poľsko',
            'Brunei' => 'Brunej',
            'Colombia' => 'Kolumbia',
            'Senegal' => 'Senegal',
            'Belarus' => 'Bielorusko',
            'Burkina Faso' => 'Burkina Faso',
            'Taiwan' => 'Taiwan',
            'Lebanon' => 'Libanon',
            'Gibraltar' => 'Gibraltár',
            'Jordan' => 'Jordánsko',
            'Venezuela' => 'Venezuela',
            'Serbia' => 'Srbsko',
            'Réunion' => 'Réunion',
            'Norway' => 'Nórsko',
            'Ghana' => 'Ghana',
            'Latvia' => 'Lotyšsko',
            'Cyprus' => 'Cyprus',
            'Martinique' => 'Martinik',
            'Uzbekistan' => 'Uzbekistan',
            'Guadeloupe' => 'Guadeloupe',
            'Moldova' => 'Moldavsko',
            'San Marino' => 'San Maríno',
            'Nigeria' => 'Nigéria',
            'Ukraine' => 'Ukrajina',
            'Palestine' => 'Palestína',
            'North Macedonia' => 'Severná Macedónsko',
            'Togo' => 'Togo',
            'Dominican Republic' => 'Dominikánska republika',
            'Ivory Coast' => 'Pobrežie Slonoviny',
            'French Guiana' => 'Francúzska Guiana',
            'Cuba' => 'Kuba',
            'Maldives' => 'Maledivy',
            'Guatemala' => 'Guatemala',
            'Bermuda' => 'Bermudy',
            'Andorra' => 'Andorra',
            'Cameroon' => 'Kamerun',
            'Afghanistan' => 'Afganistan',
            'Mayotte' => 'Mayotte',
            'Macao' => 'Macao',
            'Panama' => 'Panama',
            'Lithuania' => 'Litva',
            'Costa Rica' => 'Kostarika',
            'Sint Maarten' => 'Sint Maarten',
            'Kyrgyzstan' => 'Kirgizsko',
            'Ireland' => 'Írsko',
            'Tunisia' => 'Tunisko',
            'Slovakia' => 'Slovensko',
            'Kenya' => 'Keňa',
            'Honduras' => 'Honduras',
            'DRC' => 'Konžská dem. rep.',
            'Curaçao' => 'Curaçao',
            'Ethiopia' => 'Etiópia',
            'Namibia' => 'Namíbia',
            'Jamaica' => 'Jamajka',
            'Congo' => 'Kongo',
            'Sudan' => 'Sudán',
            'Monaco' => 'Monako',
            'Saint Martin' => 'Svätý Martin',
            'Tanzania' => 'Tanzánia',
            'Mauritania' => 'Mauritánia',
            'Gambia' => 'Gambia',
            'Malta' => 'Malta',
            'Mongolia' => 'Mongolsko',
            'Bolivia' => 'Bolívia',
            'Trinidad and Tobago' => 'Trinidad a Tobago',
            'Angola' => 'Angola',
            'Bahamas' => 'Bahamské ostrovy',
            'Haiti' => 'Haiti',
            'Nepal' => 'Nepál',
            'Aruba' => 'Aruba',
            'New Caledonia' => 'Nová Kaledónia',
            'Equatorial Guinea' => 'Rovníková Guinea',
            'Benin' => 'Benin',
            'Saint Lucia' => 'Svätá Lucia',
            'St. Barth' => 'Svätý Bartolomej',
            'Somalia' => 'Somálsko',
            'St. Vincent Grenadines' => 'Svätý Vincent a Grenadíny',
            'Mauritius' => 'Maurícius',
            'Niger' => 'Niger',
            'Guyana' => 'Guyana',
            'Channel Islands' => 'Normanské ostrovy',
            'Mali' => 'Mali',
            'Montenegro' => 'Čierna Hora',
            'El Salvador' => 'El Salvador',
            'Syria' => 'Sýria',
            'MS Zaandam' => 'MS Zaandam',
            'Isle of Man' => 'Ostrov Man',
            'Zambia' => 'Zambia',
            'Cayman Islands' => 'Kajmanské ostrovy',
            'Myanmar' => 'Mjanmarsko',
            'Libya' => 'Líbya',
            'Zimbabwe' => 'Zimbabwe',
            'Cabo Verde' => 'Kapverdy',
            'Nicaragua' => 'Nikaragua',
            'Botswana' => 'Botswana',
            'CAR' => 'Stredoafrická republika',
            'Rwanda' => 'Rwanda',
            'Liechtenstein' => 'Lichtenštajnsko',
            'Madagascar' => 'Madagaskar',
            'Guinea' => 'Guinea',
            'Barbados' => 'Barbados',
            'Uganda' => 'Uganda',
            'Djibouti' => 'Džibutsko',
            'French Polynesia' => 'Francúzska Polynézia',
            'Eritrea' => 'Eritrea',
            'Dominica' => 'Dominika',
            'Grenada' => 'Grenada',
            'Laos' => 'Laos',
            'Mozambique' => 'Mozambik',
            'Seychelles' => 'Seychely',
            'Suriname' => 'Surinam',
            'Antigua and Barbuda' => 'Antigua a Barbuda',
            'Eswatini' => 'Eswatini',
            'Guinea-Bissau' => 'Guinea-Bissau',
            'Saint Kitts and Nevis' => 'Svätý Krištof a Nevis',
            'Chad' => 'Čad',
            'Fiji' => 'Fidži',
            'Vatican City' => 'Vatikán',
            'Liberia' => 'Libéria',
            'Montserrat' => 'Montserrat',
            'Turks and Caicos' => 'Turks a Caicos',
            'Anguilla' => 'Anguilla',
            'Belize' => 'Belize',
            'British Virgin Islands' => 'Britské Panenské ostrovy',
            'Burundi' => 'Burundi',
            'Malawi' => 'Malawi',
            'Caribbean Netherlands' => 'Karibské Holandsko',
            'Sierra Leone' => 'Sierra Leone',
            'Papua New Guinea' => 'Papua-Nová Guinea',
            'Timor-Leste' => 'Timor-Leste'
        ];

        if (isset($country[$current])) {
            return $country[$current];
        }
        return $current;
    }

    protected function getTable($tableId, $data)
    {
        $data = explode($tableId, $data);
        $data = $data[1];
        $data = explode('</table>', $data);
        $data = $data[0];
        $content = '<table id="' . $tableId . $data . '</table>';
        return $content;
    }

    protected function replaceValue($value)
    {
        $value = str_replace(',', '', trim($value));
        $value = str_replace('+', '', $value);
        return $value;
    }

    public function covidData($tableId)
    {
        $content = $this->getTable($tableId, $this->content);
        @$this->dom->loadHTML($content);
        $header = $this->dom->getElementsByTagName('th');
        $detail = $this->dom->getElementsByTagName('td');

        foreach ($header as $nodeHeader) {
            $dataTableHeader[] = trim($nodeHeader->textContent);
        }

        $i = 0;
        $j = 0;
        $index = 0;
        $dataTable = [];
        foreach ($detail as $nodeDetail) {
            $dataTable[$j][$this->clean($dataTableHeader[$index])] = [
                'name_origin' => $dataTableHeader[$index],
                'name' => $this->translate()[$this->clean($dataTableHeader[$index])],
                'value' => $this->replaceValue($nodeDetail->textContent)
            ];

            $i = $i + 1;
            $j = $i % count($dataTableHeader) == 0 ? $j + 1 : $j;
            $index = $i % count($dataTableHeader) == 0 ? 0 : $index + 1;
        }

        return $dataTable;
    }

    protected function initYesterdayData()
    {
        $this->yesterdayCovidData = $this->covidData(self::YESTERDAY);
    }

    protected function addColumn($name, $value)
    {
        return [
            'name_origin' => $name,
            'name' => $name,
            'value' => $value
        ];
    }

    protected function mortality($totalCases, $totalDeaths)
    {
        return round((float) $totalDeaths / (float) $totalCases * 100, 2);
    }

    protected function newRecovered($totalRecovered, $country)
    {
        $countryKey = $this->clean($country);
        $yesterdayCovidData = $this->yesterdayCovidData;
        $totalRecovered = (strlen($totalRecovered)) > 0 ? (int) $totalRecovered : 0;

        foreach ($yesterdayCovidData as $country) {
            if ($this->clean($country['countryother']['value']) == $countryKey) {
                $yesterdayRecovered = (strlen($country['totalrecovered']['value'])) > 0 ? (int) $country['totalrecovered']['value'] : 0;
                return $totalRecovered - $yesterdayRecovered;
            }
        }
        return $totalRecovered;
    }

    protected function finalData()
    {
        $response = [];
        $covidData = $this->covidData(self::TODAY);
        foreach ($covidData as $key1 => $column) {
            foreach ($column as $key2 => $row) {
                $value = empty($row['value']) ? 0 : $row['value'];
                $response[$key1][$key2] = [
                    'name_origin' => $row['name_origin'],
                    'name' => $row['name'],
                    'value' => $this->translateState($value)
                ];
                $response[$key1]['mortality'] = $this->addColumn(
                        'Úmrtnosť',
                        $this->mortality($covidData[$key1]['totalcases']['value'], $covidData[$key1]['totaldeaths']['value'])
                );
                $response[$key1]['newrecovered'] = $this->addColumn(
                        'Nové uzdravenia',
                        $this->newRecovered($covidData[$key1]['totalrecovered']['value'], $covidData[$key1]['countryother']['value'])
                );
            }
        }
        $this->finalData = $response;
    }

    public function run()
    {
        $response = json_encode($this->finalData);
        file_put_contents('data/covidWorld.json', $response);
        print $response;
    }

}
