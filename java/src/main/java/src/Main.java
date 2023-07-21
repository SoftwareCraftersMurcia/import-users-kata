package src;

import java.util.List;

public class Main {


  public static void main(String[] args) {
    List<UserProvider> userProviders = List.of(new FileUserProvider(), new UrlUserProvider());
    List<String[]> users = userProviders.stream().flatMap(p -> p.getUsers().stream()).toList();

    /**
     * users ArrayList<id: number,
     *       email: string
     *       first_name: string
     *       last_name: string>
     */

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

