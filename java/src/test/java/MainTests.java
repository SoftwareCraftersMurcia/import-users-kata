import org.assertj.core.api.BDDAssertions;
import org.junit.jupiter.api.BeforeEach;
import org.junit.jupiter.api.Test;
import src.Main;

import java.io.ByteArrayOutputStream;
import java.io.PrintStream;

public class MainTests {

  private final PrintStream standardOut = System.out;
  private final ByteArrayOutputStream outputStreamCaptor = new ByteArrayOutputStream();

  @BeforeEach
  public void setUp() {
    System.setOut(new PrintStream(outputStreamCaptor));
  }

  @Test
  public void Characterization() throws Exception {
    Main.main(new String[]{});

    BDDAssertions.then(outputStreamCaptor.toString()).isEqualToIgnoringNewLines(
      "*********************************************************************************\n" +
      "* ID\t\t\t* COUNTRY\t\t* NAME\t\t\t\t* EMAIL\t\t\t\t\t\t*\n" +
      "*********************************************************************************\n" +
      "* 200189617246\t* Germany\t\t* Lukas Schmidt\t\t* lukas.shmidt@example.com\t*\n" +
      "* 200189016257\t* Germany\t\t* Maria Fischer\t\t* maria.fischer@example.com\t*\n" +
      "* 230573109005\t* Spain \t\t* Luis Sanchez\t\t* luis.sanchez@example.com\t*\n" +
      "* 230854119034\t* Italy \t\t* Elio Pausini\t\t* elio.pausini@example.com\t*\n" +
      "* 270054311737\t* India \t\t* Mitesh Kumari\t\t* mitesh.kumari@example.com\t*\n" +
      "* 202160712259\t* Germany\t\t* Elena Mueller\t\t* elena.muller@example.com\t*\n" +
      "* 270554319031\t* India \t\t* Natasha Shah\t\t* natasha.shah@example.com\t*\n" +
      "* 100000000001\t* Australia\t\t* Nevaeh Dunn\t\t* nevaeh.dunn@example.com\t*\n" +
      "* 100000000002\t* Norway\t\t* Sara Abdallah\t\t* sara.abdallah@example.com\t*\n" +
      "* 100000000003\t* France\t\t* Melvin Perrin\t\t* melvin.perrin@example.com\t*\n" +
      "* 100000000004\t* Australia\t\t* Dawn Snyder\t\t* dawn.snyder@example.com\t*\n" +
      "* 100000000005\t* Netherlands\t\t* Irina Kaptein\t\t* irina.kaptein@example.com\t*\n" +
      "*********************************************************************************\n" +
      "12 users in total!");
  }
}
