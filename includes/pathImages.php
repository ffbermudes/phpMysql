<?php
function thumb($arq)
  {
    $caminho = "estudonauta/fotos/$arq";
    if(is_null($caminho) || !file_exists($caminho))
    {
      return "estudonauta/fotos/indisponivel.png";
    }
    else
    {
      return $caminho;
    }
  }