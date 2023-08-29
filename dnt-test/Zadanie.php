<?php

namespace DntTest;

class ZadanieTest
{
    protected $n = 3 ** 2;

    protected $x = 1;

    protected $y = 4;

    protected function generateTable()
    {
        echo '<table cellpadding="0" cellspacing="0" style="width:500px;height:500px" >';
        for ($row = 1; $row < $this->n; $row++) {
            echo '<tr>';
            for ($col = 1; $col < $this->n; $col++) {
                echo $this->drawLine($row, $col);
            }
            echo '</tr>';
        }
        echo '</table>';
    }

    protected function axisX($col)
    {
        return $col;
    }

    protected function axisY($row)
    {
        return $this->n - $row;
    }

    protected function drawLine($row, $col)
    {
        if ($this->axisX($col) == $this->x && $this->axisY($row) == $this->y) {
            return '<td style="background-color:red;border:1px solid #ff0000;">&nbsp;</td>';
        } elseif ($this->axisX($col) >= 1 && $this->axisY($row) == 1) {
            return '<td style=";border-bottom:1px solid #ff0000;">&nbsp;</td>';
        } elseif ($this->axisX($col) >= 1 && $this->axisY($row) == $this->n) {
            return '<td style=";border-top:1px solid #ff0000;">&nbsp;</td>';
        } else {
            return '<td style="border:1px solid #ff0000;">&nbsp;</td>';
        }
    }

    public function run()
    {
        $this->generateTable();
    }
}
