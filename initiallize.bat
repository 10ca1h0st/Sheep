@echo off

:change configure content
set /p name=please input your username of mysql:
set /p password=please input your password of mysql:
echo username:%name% > configure
echo password:%password% >> configure

:mysql import Sheep.sql
set mypath=%~0
mysql -u%name% -p%password% -e"source %mypath:~0,-15%Sheep.sql"

:move Sheep to Apache root directory
cd \
set /p despath=please input your Apache root directory:
%despath:~0,1%:
cd %despath%
MD Sheep
@xcopy %mypath:~0,-16% .\Sheep /e

:clean
cd Sheep
clean.bat %mypath:~0,-16%