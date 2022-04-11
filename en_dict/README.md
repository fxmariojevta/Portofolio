# English Dictionary
#### Video Demo:  https://youtu.be/AxfUykvlDuk
#### Description:

This is a web-based application using python Django framework, Bootstrap 5 stylesheet, and Jinja in HTML5. This application use PyDictionary and thesaurus.com to get the meaning, synonym, and antonym of the english word based on the user input.

Using Django framework a high-level Python web framework that encourages rapid development and clean, pragmatic design. Using this framework for this application is making the structure or the back-end side of the web processing logic using python which can be very easy to develop more in the future to add some more feature to this application.

Bootstrap 5 is the newest version of Bootstrap, which is the most popular HTML, CSS, and JavaScript framework for creating responsive, mobile-first websites. Bootstrap 5 in this application is used to make the web to be responsive and giving the best user experience by making a minimalist user interface with a nice free background.

HTML that used for this web-based application using HTML5 by use <!DOCTYPE html> on the top of the index.html file. HTML5 is a markup language used for structuring and presenting content on the World Wide Web. It is the fifth and last major HTML version that is a World Wide Web Consortium recommendation.

Jinja is a fast, expressive, extensible templating engine. Jinja is used in this web application to get the logic data that has been processed with python in the server-side. By using jinja making the result for this application easier because it is reducing some copy-paste template for the HTML, and can generate data in the HTML based on the return data from python by using loop.

PyDictionary is a Dictionary Module for Python 2/3 to get meanings, translations, synonyms and Antonyms of words. It uses WordNet for getting meanings, Google for translations, and synonym.com for getting synonyms and antonyms. This module uses Python Requests, BeautifulSoup4 and goslate as dependencies

PyDictionary is getting the data for processing the word in thesaurus.com where there has been a change in that web. Because of that, PyDictionary can only get the meaning of the word. Getting the antonym and synonym for this application is using the base idea of PyDictionary and that is using BeautifulSoup4 and request to get the data for processing the word in thesaurus.com


### How To Use:
* To use this application in local PC, get to the application directory where the manage.py file in that directory and type this command in the terminal ‘python manage.py runserver’, click the localhost link at the terminal.
* Type an english word on the search form, and press enter or click the search button to get the meaning, synonym, and antonym of the english word based on the search form input.

### Features

After typing and submit the english word on the search from, this web application will show:
* Word: The english word that has been input from the search form.
* Meaning: The meaning of the english word has been input from the search form.
* Synonym: Synonym or a word or phrase that means exactly or nearly the same as the english word has been input from the search form.
* Antonym: Antonym or a word opposite in meaning to the english word has been input from the search form.

If the synonym or the antonym doesn't show, it mean that the english word has been input from the search form doesn't has synonym or antonym.
