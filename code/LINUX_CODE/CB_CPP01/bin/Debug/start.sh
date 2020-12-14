rm -f runweb.sh
sort --random-sort List.txt >List00.txt
rm -f List.txt
mv List00.txt List.txt
./CB_CPP01
chmod 777 runweb.sh
./runweb.sh