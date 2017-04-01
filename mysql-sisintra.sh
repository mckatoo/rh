#!/bin/bash

function matar(){
CAT = `cat /tmp/mysql-sisintra.pid`
  if [ -f $CAT ]; then
    echo "MATANDO PROCESSO `cat /tmp/mysql-sisintra.pid`"
    kill `cat /tmp/mysql-sisintra.pid`
  else
    echo 'PROCESSO NÃO EXISTE'
  fi
}

function conectar(){
  read -p "Digite l para acessar em rede local ou i para acessar pela internet: " LOCAL
  case "$LOCAL" in
  l)
    ENDERECO='172.16.111.91'
    ;;
  i)
    ENDERECO='campus1-iesi.ddns.net'
  esac
  ssh -fN -L 3306:localhost:3306 cpd@$ENDERECO -p722
  ps -aux | grep ssh | grep 172.16.111.91 | grep p722 | cut -d' ' -f 3 > /tmp/mysql-sisintra.pid
}

case "$1" in
start)
  conectar
  ;;
stop)
  matar
  ;;
restart)
  echo 'PARANDO'
  matar
  echo 'REINICIANDO'
  conectar
  ;;
*)
  echo 'DIGITE START PARA INICIAR, STOP PARA FINALIZAR OU RESTART PARA REINICIAR.'
esac
