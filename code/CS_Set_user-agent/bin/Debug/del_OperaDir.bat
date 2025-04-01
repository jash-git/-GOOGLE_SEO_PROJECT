@echo off

ping 127.0.0.1 -n 5 -w 1000

set OperaDir=%cd%\Opera\profile\data

echo log start >log.txt
del /q /s /f "%OperaDir%" >>log.txt
rd /s /q "%OperaDir%" >>log.txt

REM pause