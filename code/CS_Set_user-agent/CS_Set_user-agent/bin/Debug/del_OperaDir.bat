@echo off

set OperaDir=%cd%\Opera\profile\data

del /q /s /f "%OperaDir%"
rd /s /q "%OperaDir%"

REM pause