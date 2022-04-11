import requests
from django.shortcuts import render
from PyDictionary import PyDictionary
from bs4 import BeautifulSoup

# Create your views here.
def index(request):
    return render(request, 'index.html')

def word(request):
    search = request.GET.get('search')
    dictionary = PyDictionary()

    meaning = dictionary.meaning(search)

    response = requests.get('https://www.thesaurus.com/browse/{}'.format(search))
    soup = BeautifulSoup(response.text, 'html.parser')
    soup.find('section', {'class': 'css-191l5o0-ClassicContentCard e1qo4u830'})
    synonyms = [span.text for span in soup.findAll('a', {'class': 'css-1kg1yv8 eh475bn0'})]

    response = requests.get('https://www.thesaurus.com/browse/{}'.format(search))
    soup = BeautifulSoup(response.text, 'html.parser')
    soup.find('section', {'class': 'css-191l5o0-ClassicContentCard e1qo4u830'})
    antonyms = [span.text for span in soup.findAll('a', {'class': 'css-15bafsg eh475bn0'})]
    
    result = {
        'word': search,
        'meaning': meaning['Noun'][0],
        'synonyms': synonyms,
        'antonyms': antonyms
    }
    return render(request, 'word.html', result)