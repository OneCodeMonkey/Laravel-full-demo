#! /bin/sh
echo "hello lint"
# test
VAR=50
for (( i = 0; i <= VAR; i++)); do
	printf '%s\n' "$i"
done