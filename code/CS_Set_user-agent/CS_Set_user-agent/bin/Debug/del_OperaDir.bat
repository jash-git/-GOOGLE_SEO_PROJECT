@echo off

set OperaDir=%cd%\Opera\profile\data

echo log start >log.txt
del /q /s /f "%OperaDir%" >>log.txt
rd /s /q "%OperaDir%" >>log.txt

REM pause