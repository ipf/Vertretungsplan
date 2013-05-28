***********************************
TYPO3 Extension for Vertretungsplan
***********************************

What does it do?
================

This Extension for TYPO3 parses a Vertretungsplan currently only Available for the `Untis Software <http://www.grupet.at/de/produkte/untis/uebersicht_untis.php>`_
in version Untis 13.

Installation
============

Simply Install the Extension and include the static TypoScript.
The default path for the Vertretungsplan's files is fileadmin/Untis/ but you can adapt it to your preferred path in TypoScript with the constant

``plugin.tx_vertretungsplan_pi1.storageFolder = your/path/here``

determines whether the news for the day are shown or not. Sometimes it is not desired to show the teachers that are not at school.

Just include the frontend Plugin "Vertretungsplan" and upload the Untis-generated files and the content will be shown in the frontend.


Number of days to be shown for the upcoming week
------------------------------------------------

The TypoScript Option

``plugin.tx_vertretungsplan_pi1.showDaysOfNextWeek``

sets the number of days that are shown for the next week. The default value is set to 7 - but may be adjusted to any value between 0 (not displaying anything for the next week) and 7 (show all entries for the next week).
Maybe setting this to 2 is a good value.

Development
===========

The development and sourcecode management is done with git and currently on GitHub. Feel free to clone this Extension or to send me pull requests.
The repository can be found `here <https://github.com/ipf/Vertretungsplan>`_.

Todo
====

* Insert next week's plan
* Awareness of year-changes
* Add caching via Caching Framework