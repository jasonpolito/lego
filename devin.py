#import dependencies
import numpy as np
import pandas as pd

# open the reviews file as lines
file = open("./reviews2.txt", "r")
lines = file.readlines()

# initialize a reviews list and index
reviews_list = [[]]  # start the
current_index = 0

# loop through each line in the reviews file
for line in lines:

    # if the line is an empty line, it's a new review
    if line == "\n":
        reviews_list.append([])
        current_index += 1

    # add the line to the current review
    else:
        reviews_list[current_index].append(line.strip())

# if we find any of these words in the line, remove the line
banned_words = ['<Author>', '<Content>',
                '<Date>', '<No. Reader>', '<No. Helpful>']

# loop through each banned word
for word in banned_words:

    # loop through each review
    for review in reviews_list:

        # loop through each part (line) of the review
        for line in review:

            # if the line contains the banned word, remove it
            if word in line:
                review.remove(line)

# print the list
print(reviews_list)

# list of words to remove / columns for the dataframe
reviews_columns = [
    '<Overall>',
    '<Value>',
    '<Rooms>',
    '<Location>',
    '<Cleanliness>',
    '<Check in / front desk>',
    '<Service>',
    '<Business service>'
]

# loop though each review
for review in reviews_list:

    # loop through each line the review
    for line in review:

        # loop through each word in the "columns"
        for word in reviews_columns:

            # if the line contains the column, remove it and cast to an integer
            if word in line:
                review[review.index(line)] = int(line.replace(word, ''))

# make an array from the reviews_list
reviews_array = np.asarray(reviews_list)

# create a dataframe from the array / columns and print
df = pd.DataFrame(reviews_array, columns=reviews_columns)
# print(df)


# Use all the code from the last assignments
# with printing the dataframe or whatever
# then it's literally just the following:

######################################
############ ASSIGNMENT 7 ############
######################################

# remove business service
df = df.drop('<Business service>', 1)

# remove all -1 values
for col in df:
    df = df[df[col] != -1]

print(df)

######################################
############ ASSIGNMENT 8 ############
######################################

# describe dataframe
print(df.describe())

for col in df:
    if col != '<Overall>':
        print(df.groupby('<Overall>').describe()[col])
