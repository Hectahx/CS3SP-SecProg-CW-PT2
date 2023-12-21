#!/usr/bin/python

# Importing necessary libraries
import subprocess
import asyncio
import aiohttp
import json
import datetime

# A dictionary of valid input values for different data types
validInputs = {
    "dobData": "1990-01-01",
    "countyData": "england",
    "cardData": "4111111111111111",
    "emailData": "test@example.com",
    "fileData": "bingus.png",
    "nameData": "John",
    "lastNameData" : "Doe",
    "phoneData": "+447305939569",
    "jsonData": '{"key": "value"}',
    "passwordData": "Passw0rd!",
    "postcodeData": "B10 3AG",
    "streetNameData": "Leominster Road",
    "houseNumberData": "70",
    "areaData": "Smallheath ",
    "cityData": "Birmingham",
    "biographyData":"Hello, my name is john. I am 22 years old. I like to play football."
}

# Function to generate a deformed (fuzzed) version of an input value
def generate_deformed_input(input_value):
    # The command uses Radamsa to generate a fuzzed version of the input
    cmd = f"echo {input_value} | radamsa -n 1"
    # Running the command as a subprocess
    process = subprocess.Popen(cmd, shell=True, stdout=subprocess.PIPE, stderr=subprocess.PIPE)
    # Capturing the output and error, if any
    stdout, stderr = process.communicate()

    # If the command is successful, return the fuzzed output
    if process.returncode == 0:
        return stdout.decode(errors='ignore').strip()
    else:
        # Raise an exception if there's an error
        raise Exception(stderr.decode(errors='ignore'))

# Asynchronous function to post deformed inputs to a server
async def post_deformed_inputs_async(session, deformedInputs):
    # URL of the server where data is to be posted
    url = 'http://127.0.0.1/php/processValidation.php'
    # Preparing form data for the HTTP POST request
    data = aiohttp.FormData()

    # Adding each key-value pair to the form data
    for key, value in deformedInputs.items():
        data.add_field(key, value)

    # Sending the POST request and returning the response text
    async with session.post(url, data=data, ssl=False) as response:
        return await response.text()

# Asynchronous function to send a set of deformed inputs
async def send_deformed_input_set(session, set_number, file):
    # Dictionary to hold deformed inputs
    deformedInputs = {}
    # Generating deformed inputs for each valid input
    for input_key, input_value in validInputs.items():
        try:
            deformed_input = generate_deformed_input(input_value)
            deformedInputs[input_key] = deformed_input
        except Exception as e:
            # Logging errors if any during the input deformation process
            message = f'Set {set_number}, Error processing {input_key}: {str(e)}'
            print(message)
            file.write(message + '\n')

    # Sending the deformed inputs to the server and getting the response
    response_text = await post_deformed_inputs_async(session, deformedInputs)
    
    # Formatting the response for better readability
    formattedResponse2 = response_text.replace("],", "],\n")  # Add a newline after each ],
    
    try:
        # Preparing and logging the output
        output = (
            "////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////\n"
            f"\nSet {set_number}: \n"
            f"Data Sent to Server: \n{json.dumps(deformedInputs, indent=2)}\n"
            f"Formatted Response 2: \n{formattedResponse2}\n"
            "////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////\n"
        )
        print(output)
        file.write(output)
    except json.JSONDecodeError:
        # Handling non-JSON responses
        output = (
            "////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////\n"
            f"\nSet {set_number}\n"
            f"Data Sent to Server: \n{json.dumps(deformedInputs, indent=2)}\n"
            f"Warning: Non-JSON response received. Content: {response_text}\n"
            "////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////\n"
        )
        print(output)
        file.write(output)

# Main asynchronous function
async def main():
    # Generating a timestamped filename for output
    current_time = datetime.datetime.now().strftime("%Y-%m-%d_%H-%M-%S")
    filename = f'output-{current_time}.txt'
    # Writing the outputs to a file
    with open(filename, 'w') as file:
        async with aiohttp.ClientSession() as session:
            # Creating and running tasks for sending deformed inputs
            tasks = [send_deformed_input_set(session, i+1, file) for i in range(5)]
            await asyncio.gather(*tasks)

# Entry point of the script
if __name__ == "__main__":
    asyncio.run(main())
