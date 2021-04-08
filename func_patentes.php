<?php
$enc_patente = '';
if ($row['us_patente'] == 'sd') {
                $enc_patente = "Soldado ";
              }
              if ($row['us_patente'] == 'cb') {
                $enc_patente = "Cabo ";
              }
              if ($row['us_patente'] == '3sgt') {
                $enc_patente = "3º Sargento ";
              }
              if ($row['us_patente'] == '2sgt') {
                $enc_patente = "2º Sargento ";
              }
              if ($row['us_patente'] == '1sgt') {
                $enc_patente = "1º Sargento ";
              }
              if ($row['us_patente'] == 'st') {
                $enc_patente = "Sub Tenente ";
              }
              if ($row['us_patente'] == 'cad1') {
                $enc_patente = "Cadete 1º ano ";
              }
              if ($row['us_patente'] == 'cad2') {
                $enc_patente = "Cadete 2º ano ";
              }
              if ($row['us_patente'] == 'cad3') {
                $enc_patente = "Cadete 3º ano ";
              }
              if ($row['us_patente'] == 'asp') {
                $enc_patente = "Aspirante a Oficial ";
              }
              if ($row['us_patente'] == '2ten') {
                $enc_patente = "2º Tenente ";
              }
              if ($row['us_patente'] == '1ten') {
                $enc_patente = "1º Tenente ";
              }
              if ($row['us_patente'] == 'cap') {
                $enc_patente = "Capitão ";
              }
              if ($row['us_patente'] == 'maj') {
                $enc_patente = "Major ";
              }
              if ($row['us_patente'] == 'tc') {
                $enc_patente = "Tenente Coronel ";
              }
              if ($row['us_patente'] == 'cel') {
                $enc_patente = "Coronel ";
              }
?>