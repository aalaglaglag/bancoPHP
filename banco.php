<?php

require_once 'Conta.php';

$primeiraConta = new Conta(cpfTitular: '123.123.123.12', nomeTitular: 'Vinicius Dias');
$primeiraConta -> deposita(valorADepositar: 500);
$primeiraConta -> saca(valorASacar: 300);

echo $primeiraConta -> recuperaCpfTitular() . PHP_EOL;
echo $primeiraConta -> recuperaNomeTitular() . PHP_EOL;
echo $primeiraConta -> recuperaSaldo();

$segundaConta = new Conta(cpfTitular: '321.312.321.32', nomeTitular: 'Cleiton');
var_dump($segundaConta);

echo self::recuperaNumeroDeContas();
