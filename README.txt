Software Requirements:

1. Wamp/Lamp Server
2. Yii 1.1
3. git

Pulling repository/project from github:

1. install git if its not.
2. Using console go to the directory where your www directory is there for web hosting
3. cd /var/www/html for lamp and cd wamp\www for wamp
4. create a project directory with this command.
LInix:
$>mkdir numerology
Windows:
>md numerology
Now change directory with this command
>cd numerology
5. Initialize the git with this command
>git init
6. Add remote git connection with this command
>git remote add origin https://github.com/irfanshk80/Numerology.git
7. Now pull the project
>git pull origin master


Import Database:

1. Find the num.sql in task directory of the project.
2. First Login and Create Database in mysql with this command
>create database numerology;
3. Import database with this command with task.sql provided by me is in D: drive
>mysql -u root -p numerology < D:\num.sql
4. On prompting for the password enter the password.

Change Config file:

1. Please change mysql password in main.config file