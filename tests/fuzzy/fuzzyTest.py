#!/usr/bin/python

import subprocess
import asyncio
import aiohttp
import json
import datetime

validInputs = {
    "dobData": "1990-01-01",
    "countyData": "england",
    "cardData": "4111111111111111",
    "emailData": "test@example.com",
    "fileData": "bingus.png",
    "nameData": "John Doe",
    "phoneData": "+447305939569",
    "jsonData": '{"key": "value"}',
    "passwordData": "Passw0rd!",
    "postcodeData": "B10 3AG",
}

def generate_deformed_input(input_value):
    cmd = f"echo {input_value} | radamsa -n 1"
    process = subprocess.Popen(cmd, shell=True, stdout=subprocess.PIPE, stderr=subprocess.PIPE)
    stdout, stderr = process.communicate()

    if process.returncode == 0:
        return stdout.decode(errors='ignore').strip()
    else:
        raise Exception(stderr.decode(errors='ignore'))

async def post_deformed_inputs_async(session, deformedInputs):
    url = 'http://192.168.124.132/php/processValidation.php'
    data = aiohttp.FormData()

    for key, value in deformedInputs.items():
        data.add_field(key, value)

    async with session.post(url, data=data, ssl=False) as response:
        return await response.text()

async def send_deformed_input_set(session, set_number, file):
    deformedInputs = {}
    for input_key, input_value in validInputs.items():
        try:
            deformed_input = generate_deformed_input(input_value)
            deformedInputs[input_key] = deformed_input
        except Exception as e:
            message = f'Set {set_number}, Error processing {input_key}: {str(e)}'
            print(message)
            file.write(message + '\n')

    response_text = await post_deformed_inputs_async(session, deformedInputs)
    try:
        response_json = json.loads(response_text)
        output = (
            "////////////////////////////////////////////////////////////////////////////\n"
            f"\nSet {set_number}: \n"
            f"Data Sent to API: \n{json.dumps(deformedInputs, indent=4)}\n"
            f"Response from API: \n{json.dumps(response_json, indent=4)}\n"
            "////////////////////////////////////////////////////////////////////////////\n"
        )
        print(output)
        file.write(output)
    except json.JSONDecodeError:
        output = (
            "////////////////////////////////////////////////////////////////////////////\n"
            f"\nSet {set_number}\n"
            f"Data Sent to API: \n{json.dumps(deformedInputs, indent=4)}\n"
            f"Warning: Non-JSON response received. Content: {response_text}\n"
            "////////////////////////////////////////////////////////////////////////////\n"
        )
        print(output)
        file.write(output)

async def main():
    current_time = datetime.datetime.now().strftime("%Y-%m-%d_%H-%M-%S")
    filename = f'output-{current_time}.txt'
    with open(filename, 'w') as file:
        async with aiohttp.ClientSession() as session:
            tasks = [send_deformed_input_set(session, i+1, file) for i in range(5)]
            await asyncio.gather(*tasks)

if __name__ == "__main__":
    asyncio.run(main())