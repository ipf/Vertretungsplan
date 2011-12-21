##########################################
TYPO3 Extension for Untis Vertretungsplan
##########################################

****************
What does it do?
****************

This Extension for TYPO3 parses a Vertretungsplan generated out of the [Untis Software](http://www.grupet.at/de/produkte/untis/uebersicht_untis.php).

************
Installation
************

Simply Install the Extension and include the static TypoScript.
The default path for the Vertretungsplan's files is fileadmin/Untis/ but you can adapt it to your preferred path in TypoScript with the constant
plugin.tx_vertretungsplan_pi1.storageFolder = your/path/here

The other constant
plugin.tx_vertretungsplan_pi1.showMotd = 1
determines whether the news for the day are shown or not. Sometimes it is not desired to show the teachers that are not at school.

Just include the frontend Plugin "Vertretungsplan" and upload the Untis-generated files and the content will be shown in the frontend.

========
Fakeweek
========

With the TypoScript Option plugin.tx_vertretungsplan_pi1.fakeWeek you are able to simulate a specific week of the year.
Instead of the current one the contents of this week's vertretungsplan is parsed

****************
Why not Extbase?
****************

Extbase is cool! Really. But it would nowadays be the total overkill for this small Extension, so I decided to do it in the oldschool piBase way.

***********
Development
***********

The development and sourcecode management is done with git. Feel free to clone this Extension or to send me pull requests.
The repository can be found `here <https://github.com/ipf/Vertretungsplan>`_.

****
Todo
****

* Awareness of year-changes
* Configuration how many days of the following week are show
