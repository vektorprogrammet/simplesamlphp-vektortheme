## SAML
Dette prosjektet er et theme for [SimpleSAMLphp](https://simplesamlphp.org/). SimpleSAMLphp er en implementasjon av [SAML](https://en.wikipedia.org/wiki/SAML_2.0) protokollen, som er laget for å utveklse authentisering- og uauthoriseringsdata. Vektorprogrammet bruker denne protokollen for å tilby authentisering av brukere i Vektorprogrammet til Google sine tjenester.

## Theme
Dette repositoriet inneholder filene som er nødvendige for å style innloggingssiden til SimpleSAMLphp.
#### Statiske filer
Statiske filer som `.js`, `.css` og `.png` legges i `/var/simplesamlphp/www/resources`
#### Innloggingsside
Selve siden for innlogging ligger i

Header: `/var/simplesamlphp/modules/vektorprogrammet/themes/vektortheme/default/includes/header.php`

Body: `/var/simplesamlphp/modules/vektorprogrammet/themes/vektortheme/core/loginuserpass.php`

Footer: `/var/simplesamlphp/modules/vektorprogrammet/themes/vektortheme/default/includes/footer.php`

## Authentisering
Koden som authentiserer mot Vektorprogrammet.no ligger i `/var/simplesamlphp/modules/vektorprogrammet/lib/Auth/Source/UserPass.php`. Her vil brukernavn og passord bli videresendt til `https://vektorprogrammet.no/sso/login` for å gjennomføre authentiseringen (https://github.com/vektorprogrammet/vektorprogrammet/blob/master/src/AppBundle/Controller/SsoController.php#L11).

## Konfigurasjon
#### Konfigurering av SimpleSAMLphp
Konfigurasjonsfil: `/var/simplesamlphp/config/config.php`

`secretsalt`: En salt som brukes til å generere secure hash.

`technicalcontact_name`: Navn på teknisk ansvarlig.

`technicalcontact_email`: Epost til teknisk ansvarlig.

`timezone`: Europe/Oslo.

`enable.saml20-idp`: true. Aktiverer SAML2.0 IDP funksjonaliteten.

`theme.use`: vektorprogrammet:vektortheme. Setter hvilket theme som skal brukes.

#### Konfigurering av Google som Service Provider (SP)
Konfigurasjonsfil: `:/var/simplesamlphp/metadata/saml20-sp-remote.php`

```php
$metadata['google.com'] = array(
        'AssertionConsumerService' => 'https://www.google.com/a/vektorprogrammet.no/acs',
        'NameIDFormat' => 'urn:oasis:names:tc:SAML:1.1:nameid-format:emailAddress',
        'simplesaml.nameidattribute' => 'uid',
        'simplesaml.attributes' => false,
);

```
