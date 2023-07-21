package src;

import java.util.List;

public class Printer {

  /**
   * users ArrayList<
   *       id: number,
   *       country: string
   *       first_name: string
   *       email: string
   */
  static void extracted(List<String[]> users) {
    // Print users
    System.out.println("*********************************************************************************");
    System.out.println("* ID\t\t\t* COUNTRY\t\t* NAME\t\t\t\t* EMAIL\t\t\t\t\t\t*");
    System.out.println("*********************************************************************************");
    for (String[] item : users) {
      System.out.println(String.format("* %s\t* %s\t\t* %s\t\t* %s\t*", item[0], item[3], item[2], item[5]));
    }
    System.out.println("*********************************************************************************");
    System.out.println(users.size() + " users in total!");
  }
}
