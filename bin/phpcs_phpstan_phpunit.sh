#!/bin/bash

STEP_COUNT=3
STEPS=(
    "checking code formats"
    "static debugging"
    "php unit-test"
)
STEP_CMDS=(
    "vendor/bin/phpcs --standard=PSR2 app/"
    "vendor/bin/phpstan analyse -l 0 -c phpstan.neon app/"
    "vendor/bin/phpunit tests/"
)

for ((i=0; i<${STEP_COUNT}; i++))
  do
    echo " ============================================================ "
    echo ">>> ${STEPS[i]} start...";
    ${STEP_CMDS[i]}
    echo ">>> ${STEPS[i]} finished.";
    echo " ============================================================ "
    echo
  done
