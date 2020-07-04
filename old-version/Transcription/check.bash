files=(audio.m4a)
while true
do
	if [ -e "${files[0]}" ];
	then
    		python3.6 transcription.py
	else
		sleep 5
	fi
done
