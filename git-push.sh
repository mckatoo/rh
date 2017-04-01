#!/bin/bash

read -p "DIGITE UMA DESCRIÇÃO PARA O COMMIT: " DESC

if [ -n "$DESC" ]; then
  `git add .`
  `git commit -m "$DESC"`
  `git push`
else
  echo 'É NECESSÁRIO UMA DESCRIÇÃO PARA O COMMIT.'
fi

