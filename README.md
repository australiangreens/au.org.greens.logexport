# au.org.greens.logexport

This Extension logs to a files within the ConfigandLog directory whenever an export happens, who performed it what columns involved and the relevant entity Ids

The extension is licensed under [AGPL-3.0](LICENSE.txt).

## Requirements

* PHP v5.4+
* CiviCRM 5.8+

## Installation (Web UI)

This extension has not yet been published for installation via the web UI.

## Installation (CLI, Zip)

Sysadmins and developers may download the `.zip` file for this extension and
install it with the command-line tool [cv](https://github.com/civicrm/cv).

```bash
cd <extension-dir>
cv dl au.org.greens.logexport@https://github.com/australiangreens/au.org.greens.logexport/archive/master.zip
```

## Installation (CLI, Git)

Sysadmins and developers may clone the [Git](https://en.wikipedia.org/wiki/Git) repo for this extension and
install it with the command-line tool [cv](https://github.com/civicrm/cv).

```bash
git clone https://github.com/australiangreens/au.org.greens.logexport.git
cv en logexport
```

## Usage

You would need to navigate to your ConfigAndLog directory where the normal debug logs are kept and view the `Export_Log` from there

