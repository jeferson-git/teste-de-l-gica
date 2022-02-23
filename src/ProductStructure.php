<?php

namespace App;

class ProductStructure
{
    const products = [
        "preto-PP",
        "preto-M",
        "preto-G",
        "preto-GG",
        "preto-GG",
        "branco-PP",
        "branco-G",
        "vermelho-M",
        "azul-XG",
        "azul-XG",
        "azul-XG",
        "azul-P"
    ];

    public function make(): array
    {
        $products = [
            "preto-PP",
            "preto-M",
            "preto-G",
            "preto-GG",
            "preto-GG",
            "branco-PP",
            "branco-G",
            "vermelho-M",
            "azul-XG",
            "azul-XG",
            "azul-XG",
            "azul-P",
        ];

        $arr    = [];
        $count  = 0;

        // Separando cor & tamanho;
        foreach ($products as $product) {
            $arr[] = explode('-', $product);

            // Criando os índices "cor" e índices "tamanho ;
            foreach ($arr as $key => $value) {
                $indexColor[]   = $value[0];
                $indexSize[]    = $value[1];
            };

            // Obtendo valores Únicos;
            $indexColor = array_unique($indexColor);
            $indexSize  = array_unique($indexSize);

            // Criando o formato da resposta;
            foreach ($indexColor as $c) {
                foreach ($indexSize as $s) {
                    $count = 0;
                    foreach ($products as $key) {
                        if ($key === "$c-$s") {
                            $count = ++$count;
                        };
                        $response["$c"]["$s"] = $count;
                    }
                }
            }

            // Removento Valores que não foram obtidos;
            foreach ($indexSize as $s) {
                foreach ($response as $key => $value) {
                    $element = $value[$s];
                    if ($element === 0) {
                        unset($response[$key][$s]);
                    }
                }
            }
        }

      

        return $response;
    }
}
