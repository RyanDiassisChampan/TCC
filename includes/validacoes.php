<?php
function valorPost($campo)
{
    return trim($_POST[$campo] ?? '');
}

function validarNome($nome)
{
    return $nome !== '' && mb_strlen($nome) >= 3 && mb_strlen($nome) <= 100
        && (bool)preg_match("/^[\p{L}\s'-]+$/u", $nome);
}

function validarCPF($cpf)
{
    $cpf = preg_replace('/\D/', '', $cpf);

    if (strlen($cpf) !== 11 || preg_match('/^(\d)\1{10}$/', $cpf)) return false;

    for ($t = 9; $t < 11; $t++) {
        $soma = 0;
        for ($i = 0; $i < $t; $i++) {
            $soma += (int)$cpf[$i] * (($t + 1) - $i);
        }
        $digito = ((10 * $soma) % 11) % 10;
        if ((int)$cpf[$t] !== $digito) return false;
    }
    return true;
}

function validarTelefone($telefone)
{
    if ($telefone === '') return true;
    $telefone = preg_replace('/\D/', '', $telefone);
    return strlen($telefone) === 10 || strlen($telefone) === 11;
}

function validarCEP($cep)
{
    if ($cep === '') return true;
    $cep = preg_replace('/\D/', '', $cep);
    return strlen($cep) === 8;
}

function validarUF($estado)
{
    if ($estado === '') return true;
    return (bool)preg_match('/^[A-Za-z]{2}$/', $estado);
}

function validarTexto($texto, $maximo, $obrigatorio = false)
{
    if ($texto === '') return !$obrigatorio;
    return mb_strlen($texto) <= $maximo;
}

function validarTextoSemNumeros($texto, $maximo, $obrigatorio = false)
{
    if ($texto === '') return !$obrigatorio;
    return mb_strlen($texto) <= $maximo && (bool)preg_match("/^[\p{L}\s'-]+$/u", $texto);
}

function validarLogradouro($texto, $maximo = 45)
{
    if ($texto === '') return true;
    return mb_strlen($texto) <= $maximo
        && (bool)preg_match("/^[\p{L}\d\s'.,ºª\/-]+$/u", $texto);
}

function validarComplemento($texto, $maximo = 100)
{
    if ($texto === '') return true;
    return mb_strlen($texto) <= $maximo
        && (bool)preg_match("/^[\p{L}\d\s'.,ºª\/-]+$/u", $texto);
}

function validarNumeroEndereco($numero)
{
    if ($numero === '') return true;
    return (bool)preg_match('/^[0-9A-Za-zÀ-ÿ\s\/-]{1,10}$/u', $numero);
}

function validarSenha($senha)
{
    return strlen($senha) >= 6 && strlen($senha) <= 255;
}

function validarEmail($email)
{
    return $email !== '' && mb_strlen($email) <= 100 && filter_var($email, FILTER_VALIDATE_EMAIL) !== false;
}

function validarProdutoModelo($modelo)
{
    return $modelo !== '' && mb_strlen($modelo) <= 100;
}

function validarProdutoDescricao($descricao)
{
    return $descricao !== '' && mb_strlen($descricao) <= 350;
}

function validarProdutoMarca($marca)
{
    return $marca !== '' && mb_strlen($marca) <= 50
        && (bool)preg_match("/^[\p{L}\d\s&.'-]+$/u", $marca);
}

function validarValorProduto($valor)
{
    return is_numeric($valor) && (float)$valor > 0;
}

function validarEstoque($estoque)
{
    return filter_var($estoque, FILTER_VALIDATE_INT) !== false && (int)$estoque >= 0;
}
?>
