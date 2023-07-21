package src;

import java.math.BigInteger;

public record User(BigInteger id, String country, String name, String email) {
}
