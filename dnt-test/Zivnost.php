<?php

namespace DntTest;

use DntLibrary\Base\Dnt;

class ZivnostTest
{
    protected $dnt;

    protected $monthFixTPP = 1900; //1848.9; //1480

    protected $aproximateYears = 3;

    protected $cistaMzdaPercent = 73.42;

    protected $superHrubaMzdaPercent = 135.21;

    protected $cistaMzdaTppMesiac;

    protected $cistaMzdaTppRok;

    public function __construct()
    {
        $this->dnt = new Dnt();
    }

    public function yearTPP()
    {
        $this->cistaMzdaTppMesiac = $this->monthFixTPP / 100 * $this->cistaMzdaPercent;
        $this->cistaMzdaTppRok = $this->cistaMzdaTppMesiac * 12;
    }

    public function init()
    {
        $this->yearTPP();
    }

    public function zivnost($rok)
    {
        $odvodyZP = 70.91;
        $odvodySP = 0;
        $nezdanitelna = 4414.20;
        $pausalnePercent = 60;
        $danZPrijmu = 15;

        if ($rok == 1) {
            $rocnaTrzba = $this->monthFixTPP / 100 * $this->superHrubaMzdaPercent * 12;
            $pausalne = $rocnaTrzba * 0.6;
            if ($pausalne >= 20000) {
                $pausalne = 20000;
            }
            $zdravotka = $odvodyZP * 12;
            $socialka = $odvodySP * 12;

            $zakladDane = $rocnaTrzba - $pausalne - $zdravotka - $socialka - $nezdanitelna;
            if ($rocnaTrzba < 30000) {
                $dan = $zakladDane / 100 * 15;
            } else {
                $dan = $zakladDane / 100 * 19;
            }

            $cistyZisk = $rocnaTrzba - $zdravotka - $socialka - $dan;
            return $zakladDane;
        } else {
            return 0;
        }
    }

    public function run()
    {
        $this->init();

        $render = '<table style="width:500px">';
        $render .= '<tr>';
        $render .= '<td>';
        $render .= 'ROK';
        $render .= '</td>';
        $render .= '<td>';
        $render .= 'TPP CISTE';
        $render .= '</td>';
        $render .= '<td>';
        $render .= 'ZIVNOST CISTE';
        $render .= '</td>';
        $render .= '</tr>';
        for ($i = 1; $i <= $this->aproximateYears; $i++) {
            $render .= '<tr>';
            $render .= '<td>';
            $render .= $i;
            $render .= '</td>';
            $render .= '<td>';
            $render .= '<b>' . $this->cistaMzdaTppMesiac . '</b> / ' . $this->cistaMzdaTppRok;
            $render .= '</td>';
            $render .= '<td>';
            $render .= $this->zivnost($i);
            $render .= '</td>';
            $render .= '</tr>';
        }
        $render .= '</table>';
        echo $render;
    }
}
