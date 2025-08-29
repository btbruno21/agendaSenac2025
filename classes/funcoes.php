<?php
class Funcoes
{
    public function dtNasc($vlr, $tipo)
    {
        switch ($tipo) {
            case 1:
                $rst = implode("-", array_reverse(explode("/", $vlr))); //converte data brasil para internacional
                break;

            case 2:
                $rst = implode("/", array_reverse(explode("-", $vlr))); //converte data internacional para brasil
                break;
        }
        return $rst;
    }
    //novas funções
}
