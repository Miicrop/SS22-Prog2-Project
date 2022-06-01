import 'dart:convert';

List<Protokoll> protokollFromJson(String str) =>
    List<Protokoll>.from(json.decode(str).map((x) => Protokoll.fromJson(x)));

String protokollToJson(List<Protokoll> data) =>
    json.encode(List<dynamic>.from(data.map((x) => x.toJson())));

class Protokoll {
  Protokoll({
    required this.id,
    required this.tag,
    required this.zugang,
    required this.datum,
  });

  String id;
  String tag;
  String zugang;
  String datum;

  factory Protokoll.fromJson(Map<String, dynamic> json) => Protokoll(
        id: json["ID"],
        tag: json["TAG"],
        zugang: json["ZUGANG"],
        datum: json["DATUM"],
      );

  Map<String, dynamic> toJson() => {
        "ID": id,
        "TAG": tag,
        "ZUGANG": zugang,
        "DATUM": datum,
      };
}
