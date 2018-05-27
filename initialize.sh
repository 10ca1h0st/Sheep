#!/bin/sh

#the location of script
mypath=$(cd $(dirname $0);pwd)

#set configure
read -p "please input your username of mysql:" username

read -p "please input your password of mysql:" password

echo "username:$username" > ${mypath}/configure
echo "password:$password" >> ${mypath}/configure

#set database

mysql -u${username} -p${password} -e"source ${mypath}/Sheep.sql"

if [ $? -ne 0 ]; then
	echo "you input wrong username or password"
else

	#move Sheep

	read -p "please input your apache root directory:" apache
	cd $apache
	mkdir Sheep
	cp -R $mypath ./

	#set mode
	chmod -R 777 Sheep

	#clean
	cd Sheep
	./clean.sh $mypath
fi