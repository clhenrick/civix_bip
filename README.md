## Bip Data Entity Extension
This depends on the nyc_geocoder extension to map BIP Data import BBLs to address entities

## Importing BIP Data
There are many ways to install BIP data into CiviCRM.  The most efficient is to convert the .xlsx file containing the BIP data to a CSV file, then use PHPMyAdmin to import directly into `civicrm_bipdata`.  However, as of this writing the columns in `civicrm_bipdata` don't line up with those in the BIP Excel file.  You can reorder them by editing `xml/auto_install.xml`.

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
