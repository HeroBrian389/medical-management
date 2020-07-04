import speech_recognition as sr
from docx import Document
from docx.shared import Inches
import os

os.system('ffmpeg -y -i audio.m4a audio.wav -loglevel quiet')
os.system('sudo chmod 777 audio.wav')
document = Document()

r = sr.Recognizer()
harvard = sr.AudioFile('audio.wav')
with harvard as source:
  audio = r.record(source)

text = r.recognize_google(audio)

p = document.add_paragraph(text)

document.save('demo.docx')
