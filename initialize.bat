@echo off

set mypath=%~dp0

:change configure content
set /p name=please input your username of mysql:
set /p password=please input your password of mysql:
echo username:%name% > %mypath%configure
echo password:%password% >> %mypath%configure

:mysql import Sheep.sql
mysql -u%name% -p%password% -e"source %mypath%Sheep.sql"

IF ERRORLEVEL 1 goto fail
IF ERRORLEVEL 0 goto success

:fail
echo you input wrong username or password
pause
exit


:success

:move Sheep to Apache root directory
:use setlocal enabledelayedexpansion because bat regard all statements in a () as a statement

cd \
set /p despath=please input your Apache root directory:
cd /D %despath%
MD Sheep
@xcopy %mypath:~0,-1% .\Sheep /E /Y


:clean
cd Sheep
clean.bat %mypath:~0,-1%
