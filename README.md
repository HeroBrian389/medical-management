# medical-management
A centralised patient management system

It is hosted at http://neurospine.cf and http://neurospine.cf/medhub/start

Medhub is a medical management software that improves the way patients and doctors interact with each other.

Issues with avilable systems:
1) Current systems are old, have poor compatibility and are isolated.
2) Current systems have no mechanism for patients to access their files easily
3) Current systems are ineffecient and require a lot of manual actions - sending emails/following up on appointments/requesting payment. There is also no way for patients and doctors to directly interact.

My solutions:
1) Redesign dashboard and UI for improved workflow, aesthetics and compatiblity. Increase automation and AI to streamline processes such as scanning files, sending emails, creating appointments and contacting patients. Reduce human error and make more effecient use of time.
2) Patient is given a login portal where they can access any reports/letters/appointments created on their account. Less information is mishandled. Patient enters info about themselves (medical procedures, DOB, phone, email, name, etc.) and they can choose which info can be accessed by doctors - ensures privacy.
3) I want to create a "pinging" or "tagging" system. Whenever an action is taken by either the doctor or patient, either can choose to tag another doctor/patient in the report. This means whoever is tagged has access to that file. They can also tag other doctors/patients. Only one copy of the file exists and it exists in the creators account. This reduces the amount of time finding email addresses and sending emails or finding addresses and posting letters. Recipients can still email and download the file/letter, however the ideal situation is that all doctors/patients use the system to send documents to each other. 

File navigation help:
medhub
|-- start
|   |-- userProfile.php (user profile) http://neurospine.cf/medhub/start/userProfile.php
|   |-- hospital.php (hospital search) http://neurospine.cf/medhub/start/hospital.php
|   |-- index.php (dashboard) http://neurospine.cf/medhub/start/index.php
|   |-- hospitalUser.php (hospital profile) http://neurospine.cf/medhub/start/hospitalUser.php
|   -- reportUser.php (show reports) http://neurospine.cf/medhub/start/reportUser.php

This is for patch ✊
