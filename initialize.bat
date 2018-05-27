@echo off

set mypath=%~dp0

:change configure content
set /p name=please input your username of mysql:
set /p password=please input your password of mysql:
echo username:%name% > %mypath%configure
echo password:%password% >> %mypath%configure

:mysql import Sheep.sql
mysql -u%name% -p%password% -e"source %mypath%Sheep.sql"

set result=%errorlevel%

IF NOT %result% == 0 (
    echo you input wrong username or password
    pause
)else (

    :move Sheep to Apache root directory
    cd \
    set /p despath=please input your Apache root directory:
    cd /D %despath%
    MD Sheep
    @xcopy %mypath:~0,-1% .\Sheep /E

    :clean
    cd Sheep
    clean.bat %mypath:~0,-1%
)