package src;

import java.util.List;

public class Main {


  public static void main(String[] args) {
    List<UserProvider> userProviders = List.of(new FileUserProvider(), new UrlUserProvider());
    List<String[]> users = userProviders.stream().flatMap(p -> p.getUsers().stream()).toList();



    Printer.extracted(users);
  }
}

