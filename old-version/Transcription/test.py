import speech_recognition as sr

r = sr.Recognizer()

with sr.AudioFile('A.wav') as source:
    audio = r.record(source)

r.recognize_google(audio)
