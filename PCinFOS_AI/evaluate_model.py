import tensorflow as tf
import numpy as np
import pandas as pd
from sklearn.metrics import classification_report

def evaluate_model(csv_file_path, model_file_path, categories, threshold=0.6):
    # Read the CSV file into a DataFrame
    df = pd.read_csv(csv_file_path, sep=";")
    df = df[["ethnicity", "height", "weight", "age", "activity", "birth_control", "food_preferences"]]

    # Load the model
    model = tf.keras.models.load_model(model_file_path)

    # Support functions
    def process_target(df):
        df['target'] = df["target"].str.replace(' ', '')
        target = df.pop('target').to_numpy().tolist()
        for i, item in enumerate(target):
            one_hot = [0 for _ in range(len(categories))]
            for label in item.split(','):
                if label in categories:
                    one_hot[categories.index(label)] = 1
            target[i] = one_hot
        return target

    def df_to_dataset(dataframe, shuffle=True, batch_size=32):
        dataframe = dataframe.copy()
        ds = tf.data.Dataset.from_tensor_slices(dict(dataframe))
        if shuffle:
            ds = ds.shuffle(buffer_size=len(dataframe))
        ds = ds.batch(batch_size)
        return ds

    def multi_label_accuracy(y_true, y_pred):
        y_true = np.array(y_true)
        y_pred = np.array(y_pred)
        assert y_true.shape == y_pred.shape
        match = (y_true == y_pred)
        sample_accuracy = np.mean(match, axis=1)
        average_accuracy = np.mean(sample_accuracy)
        return average_accuracy

    # Create the dataset
    ds = df_to_dataset(df, shuffle=False)

    # Predict labels
    predicted_labels = tf.cast(tf.sigmoid(model.predict(ds)) > threshold, tf.int32)
    predicted_labels = predicted_labels.numpy()

    # Convert predicted labels to final labels
    final_labels = []
    for i in range(len(predicted_labels)):
        labels = [categories[j] for j in range(len(categories)) if predicted_labels[i][j] == 1]
        final_labels.append(labels)

    # Calculate performance metrics
    test_labels = process_target(df)
    accuracy = multi_label_accuracy(test_labels, predicted_labels)
    classification_report_output = classification_report(test_labels, predicted_labels, target_names=categories)

    return final_labels, accuracy, classification_report_output

# Usage example
csv_file_path = "/Users/aiganym/Desktop/PCinFOS_AI/sample.csv" # change to your directory
model_file_path = "/Users/aiganym/Desktop/PCinFOS_AI/model.py" # change to your directory
categories = ["spinach_1", "spinach_2", "spinach_3", "cheakpeas_1", "cheakpeas_2", "cheakpeas_3",
              "salmon_1", "salmon_2", "salmon_3", "almonds_1", "almonds_2", "almonds_3",
              "grapefruit_1", "grapefruit_2", "grapefruit_3"]

final_labels, accuracy, classification_report_output = evaluate_model(csv_file_path, model_file_path, categories)

# Print the predicted labels and performance metrics
print("\nPredicted labels are as follows:")
for labels in final_labels:
    print(labels)
print(f"\nAccuracy: {accuracy}")
print(f"\nClassification Report:\n{classification_report_output}")
