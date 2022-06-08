import 'protokoll.dart';
import 'package:http/http.dart' as http;

Future<List<Protokoll>> fetchProtokoll() async {
  String url = 'http://192.168.43.23/Admin/app.php';
  final response = await http.get(Uri.parse(url));
  return protokollFromJson(response.body);
}
