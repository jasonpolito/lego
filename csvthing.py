import sys
import csv
import shutil
import time
startTime = time.time()

csv.field_size_limit(sys.maxsize)

emails = []

with open('existing.csv') as csv_file:
    csv_reader = csv.reader(csv_file, delimiter=',')
    line_count = 0
    for row in csv_reader:
        if line_count > 0:
            emails.append(row[4].lower())
        line_count += 1

new_file = open("cleansed.csv", "w")

with open('fulllist.txt') as csv_file:
    csv_reader = csv.reader(csv_file, delimiter='|')
    for row in csv_reader:
        print_line = True
        for email in emails:
            try:
                if email == row[31].lower():
                    print_line = False
            except IndexError:
                print('sorry, no 31')
        if print_line:
            new_file.write(','.join(row) + '\n')

new_file = open("brevard_osceola.csv", "w")

with open('cleansed.csv') as csv_file:
    csv_reader = csv.reader(csv_file, delimiter=',')
    for row in csv_reader:
        print_line = False
        try:
            print(row[17].lower())
            if row[17].lower() == 'brevard' or row[17].lower() == 'osceola':
                print_line = True
        except IndexError:
            print('sorry, no 16')
        if print_line:
            new_file.write(','.join(row) + '\n')


executionTime = (time.time() - startTime)
print('Execution time in seconds: ' + str(executionTime))
