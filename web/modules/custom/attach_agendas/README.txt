-- SUMMARY --

The Attach Agendas module attaches agendas and minutes to existing Committee Meeting nodes.

-- INSTALLATION --

The module installs just as any other Drupal module.

-- CONFIGURATION --

All configuration is done in the meetings.yml file included with the mosule.

-- FILE SYSTEM --

You will need all of the agendas and minutes we currently have, in the following structure:

web
|
--sites
       |
       --default
		|
		--files
		      |
		      --agendas
                        minutes

This can be deleted after successful attachment.

-- PREPARATION --

When this module is used, it is best to delete and re-create the Committee Meeting nodes.

1. Unzip the file "meetings" included with this module.

2. The file "meetings.csv" goes in a location on the server that Drupal can access.

3. Open the file "meetings.yml" and change line 8 to reflect the full, absolute Linux path to meetings.csv.

3a. Also change line 1 to a unique name for your import.

4. In the Drupal admin UI, go to Configuration -> Development -> Configuration synchronization.

5. Select Import -> Single Item.

6. In the dropdown box, select "Migration."

7. Copy and paste the contents of meetings.yml in the text area.

8. Press "Import."

9. If everything is good, Drupal will ask you if you want to import. Do so.

10. Or IT MAY THROW AN ERROR. Usually this means Drupal is looknig for a module that isn't installed.

11. Once the import is done, go to a Drush command prompt.

12. Do a "drush migrate-status" to make sure the import is there.

13. If it is, do a "drush mi [name of your import]"

14. It will take a long time. When done, drush migrate-status [name of your import] should show you the total number of nodes imported with no rejects and no errors. 

-- USING THE MODULE --

Once you have verified that the Committee Meeting nodes are present, go to Configuration -> Attach Agendas.

In the text box, type or paste the full path to the agendas and minutes

Submit the form. It will take a long time.

When done, you will see a Drupal message to that effect.
