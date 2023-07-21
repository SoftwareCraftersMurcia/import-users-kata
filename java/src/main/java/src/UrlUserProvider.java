package src;

import org.json.JSONArray;
import org.json.JSONObject;

import java.io.IOException;
import java.io.InputStream;
import java.math.BigInteger;
import java.util.*;

public class UrlUserProvider implements UserProvider {
  private static final String USER_URL = "https://randomuser.me/api/?inc=gender,name,email,location&results=5&seed=a9b25cd955e2037h";

  @Override
  public List<String[]> getUsers() {
    // Parse URL content
    String url = USER_URL;
    String command = "curl -X GET " + url;
    ProcessBuilder processBuilder = new ProcessBuilder(command.split(" "));
    Process process = null;
    try {
      process = processBuilder.start();
    } catch (IOException e) {
      throw new RuntimeException(e);
    }
    InputStream processInputStream = process.getInputStream();
    Scanner webProvider = new Scanner(processInputStream);
    String result = "";
    while (webProvider.hasNextLine()) {
      result += webProvider.nextLine();
    }
    webProvider.close();
    JSONObject jsonObject = new JSONObject(result);
    JSONArray results = jsonObject.getJSONArray("results");

    BigInteger j = new BigInteger("100000000000");
    ArrayList<String[]> resultOfURL = new ArrayList<>();
    List<User> users2 = new ArrayList<>();
    for (int i = 0; i < results.length(); i++) {
      j = j.add(new BigInteger("1"));
      resultOfURL.add(new String[]{
        j.toString(), // id
        results.getJSONObject(i).getString("gender"),
        results.getJSONObject(i).getJSONObject("name").getString("first") + " " + results.getJSONObject(i).getJSONObject("name").getString("last"),
        results.getJSONObject(i).getJSONObject("location").getString("country"),
        String.valueOf(results.getJSONObject(i).getJSONObject("location").get("postcode")),
        results.getJSONObject(i).getString("email"),
        String.valueOf((new GregorianCalendar()).get(Calendar.YEAR)) // birhtday
      });
      //users2.add(new User(j.toString(), ))
    }
    return resultOfURL;
  }
}
