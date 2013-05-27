***********************************
TYPO3 Extension for Vertretungsplan
***********************************

What does it do?
================

This Extension for TYPO3 parses a Vertretungsplan generated out of the `Untis Software <http://www.grupet.at/de/produkte/untis/uebersicht_untis.php>`_.

Installation
============

Simply Install the Extension and include the static TypoScript.
The default path for the Vertretungsplan's files is fileadmin/Untis/ but you can adapt it to your preferred path in TypoScript with the constant

``plugin.tx_vertretungsplan_pi1.storageFolder = your/path/here``

The other constant

``plugin.tx_vertretungsplan_pi1.showMotd = 1``

determines whether the news for the day are shown or not. Sometimes it is not desired to show the teachers that are not at school.

Just include the frontend Plugin "Vertretungsplan" and upload the Untis-generated files and the content will be shown in the frontend.

Fakeweek
--------

With the TypoScript Option

``plugin.tx_vertretungsplan_pi1.fakeWeek``

you are able to simulate a specific week of the year.
Instead of the current one the contents of this week's vertretungsplan is parsed

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

As soon as the TYPO3 forge is able to handle git repositories, the development will be moved to `forge <http://forge.typo3.org/projects/extension-vertretungsplan>`_.

Todo
====

* Awareness of year-changes
* Format messages of the day and remove the crappy table-stuff from them
* Add caching via Caching Framework