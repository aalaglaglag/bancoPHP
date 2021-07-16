<?php

class Conta
{
    private string $cpfTitular;
    private string $nomeTitular;
    private float $saldo;
    private static $numeroDeContas = 0;

    public function __construct(string $cpfTitular, string $nomeTitular)
    {
        $this ->cpfTitular = $cpfTitular;
        $this->validaNomeTitular($nomeTitular);
        $this -> nomeTitular = $nomeTitular;
        $this -> saldo = 0;

        Conta::$numeroDeContas++;
    }

    public function __destruct()
    {
        self::$numeroDeContas--;
    }
    public function saca(float $valorASacar)
    {
        if ($valorASacar >$this -> saldo) {
            echo "Saldo indisponível";
            return;
        }
        $this -> saldo -= $valorASacar;
    }

    public function deposita(float $valorADepositar): void
    {
        if ($valorADepositar < 0) {
            echo "Valor precisa ser positivo";
            return;
        }
        $this ->saldo += $valorADepositar;
        
    }

    public function transfere(float $valorATransferir, Conta $contaDestino): void
    {
        if ($valorATransferir > $this -> saldo) {
            echo "Saldo indisponivel";
            return;
        }
        $this -> saca($valorATransferir);
        $contaDestino ->deposita ($valorATransferir);
    }


    public function recuperaSaldo(): float
    {
        return $this ->saldo;
    }

    public function recuperaNomeTitular(): string
    {
        return $this -> nomeTitular;
    }

    public function recuperaCpfTitular(): string
    {
        return $this -> cpfTitular;
    }

    private function validaNomeTitular(string $nomeTitular){
        if (strlen($nomeTitular) < 5){
            echo "nome precisa ter pelo menos 5 caracteres";
            exit();
        }
    }

    public static function recuperaNumeroDeContas(): int
    {
        return Conta::$numeroDeContas;
    }
}
