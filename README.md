
## Bip Data Entity Extension
This extension allows you to use the data from the Building Information Project (BIP) from the University Neighborhood Housing Program (UNHP) with CiviCRM.  This extension creates custom fields on CiviCRM addresses; when a Borough-Block-Lot (BBL) number is present for an address, the BIP data is pulled in automatically to this address.

This extension depends on the [nyc_geocoder](https://github.com/clhenrick/TFHJ) extension to look up BBLs.

## Installation
* Download and unzip the extension from Github to your extensions directory.  The Github URL is: https://github.com/clhenrick/civix_bip.
If you don't know the location of your extensions directory, you can find it by going to **Administer menu » System Settings » Directories**.  If the "Extensions Directory" lists a token (e.g. "[civicrm.files]"), you can find the absolute path of that token by clicking the blue circle with a question mark in the help text at the top of the page.
* Once the files are in place, you can install them from **Administer menu » System Settings » Extensions**.
If you upgraded CiviCRM from an earlier version, "Extensions" might be "Manage Extensions", and may be under **Administer menu » Customize Data and Screens** instead.
If this extension isn't present in the list, press "Refresh".

Installation creates a new CiviCRM entity called BipData, and adds a large number of custom fields to the Address entity.  After populating the BipData table, any address that contains a BBL will pull the relevant data from the BipData entity into its custom fields.


## Populating BIP Data
There are many ways to populate BIP data into CiviCRM.  The most efficient is to convert the .xlsx file containing the BIP data to a CSV file, then use PHPMyAdmin to import directly into `civicrm_bipdata`.  However, as of this writing the columns in `civicrm_bipdata` don't line up with those in the BIP Excel file.  You can reorder them by editing `xml/auto_install.xml` BEFORE installing the extension.  If you've already installed the extension, you should be able to uninstall/reinstall safely.

You can also use an ETL tool like Pentaho Kettle, which allows you to convert directly from Excel.

You can also use the CiviCRM API, either by installing the CSV API GUI extension, or using the command-line API import tool.

If using the command line API import tool, please ensure your column names match the CiviCRM field names.  I've created a file in the `extras` folder called `headers.csv`.  Replace the headers in the BIP data Excel sheet with this.  I created them against the July 2015 data - make sure they match current data sets!
You can then use this command:

    /path/to/civicrm/bin/csv/import.php -e BipData --file /full/path/to/file.csv

Note: Replacing the headers using Excel/LibreOffice is slow!  Instead do:

    cat headers.csv > final.csv
    tail -n +2 bip_data.csv >> final.csv

## Deleting BIP Data
Deleting BIP data before reimporting is beyond the scope of this extension.  The current recommended approach is to truncate the `civicrm_bipdata` table using PHPMyAdmin or another MySQL client.
