package src;

import java.io.InputStream;
import java.util.ArrayList;
import java.util.List;
import java.util.Scanner;

class FileUserProvider implements UserProvider {

  public static final int ID = 0;
  public static final int COUNTRY = 3;
  public static final int NAME = 2;
  public static final int EMAIL = 5;

  @Override
  public List<String[]> getUsers() {
    // Parse CSV file
    ClassLoader classloader = Thread.currentThread().getContextClassLoader();
    InputStream is = classloader.getResourceAsStream("users.csv");
    List<String[]> users = new ArrayList<>();
    List<User> users2 = new ArrayList<>();
    Scanner csvFile = new Scanner(is);
    while (csvFile.hasNextLine()) {
      String line = csvFile.nextLine();
      // fields: ID, country, Name, email
      String[] attributes = line.split(",");
      if (attributes.length == 0) {
        continue;
      }
      users.add(attributes);
      users2.add(new User(attributes[ID], attributes[COUNTRY], attributes[NAME], attributes[EMAIL]));
    }
    users.remove(0); // Remove header column
    return users;
  }
}
