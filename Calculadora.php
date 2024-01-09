<?php

class Calculadora {
    public function suma($a, $b) {
        return $a + $b;
    }

    public function resta($a, $b) {
        return $a - $b;
    }

    public function multiplicacion($a, $b) {
        return $a * $b;
    }

    public function division($a, $b) {
        if ($b != 0) {
            return $a / $b;
        } else {
            throw new InvalidArgumentException("División por cero no permitida");
        }
    }
}

// Pruebas Unitarias
class CalculadoraTest {
    public function testSuma() {
        $calculadora = new Calculadora();
        assert(5 == $calculadora->suma(2, 3));
        assert(-1 == $calculadora->suma(-2, 1));
    }

    public function testResta() {
        $calculadora = new Calculadora();
        assert(3 == $calculadora->resta(5, 2));
        assert(-4 == $calculadora->resta(0, 4));
    }

    public function testMultiplicacion() {
        $calculadora = new Calculadora();
        assert(8 == $calculadora->multiplicacion(2, 4));
        assert(0 == $calculadora->multiplicacion(0, 5));
    }

    public function testDivision() {
        $calculadora = new Calculadora();
        assert(2 == $calculadora->division(6, 3));
        
        // Verificar que la división por cero lanza una excepción
        try {
            $calculadora->division(4, 0);
            assert(false, "Se esperaba una excepción");
        } catch (InvalidArgumentException $e) {
            // Excepción esperada
            assert(true);
        }
    }
}

// Ejecutar pruebas
$test = new CalculadoraTest();
$test->testSuma();
$test->testResta();
$test->testMultiplicacion();
$test->testDivision();

?>
