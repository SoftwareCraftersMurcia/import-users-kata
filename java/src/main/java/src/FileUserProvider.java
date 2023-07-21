package src;

import java.io.InputStream;
import java.util.ArrayList;
import java.util.List;
import java.util.Scanner;

class FileUserProvider implements UserProvider {
  @Override
  public List<String[]> getUsers() {
    // Parse CSV file
    ClassLoader classloader = Thread.currentThread().getContextClassLoader();
    InputStream is = classloader.getResourceAsStream("users.csv");
    List<String[]> users = new ArrayList<>();
    Scanner csvFile = new Scanner(is);
    while (csvFile.hasNextLine()) {
      String line = csvFile.nextLine();
      // fields: ID, gender, Name ,country, postcode, email, Birthdate
      String[] attributes = line.split(",");
      if (attributes.length == 0) {
        continue;
      }
      users.add(attributes);
    }
    users.remove(0); // Remove header column
    return users;
  }
}
